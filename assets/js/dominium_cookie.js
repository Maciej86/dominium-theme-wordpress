const dominiumCookie = () => {
  const cookieModal = document.querySelector(".cookie");
  if (!cookieModal) return;

  const [acceptAllBtn, acceptNecessaryBtn] = cookieModal.querySelectorAll(
    ".cookie__content__buttons .button_link"
  );

  // Set cookie
  const setCookie = (name, value, days) => {
    const expires = new Date(
      Date.now() + days * 24 * 60 * 60 * 1000
    ).toUTCString();
    document.cookie = `${name}=${value}; expires=${expires}; path=/`;
  };

  const getCookie = (name) => {
    const match = document.cookie.match(
      new RegExp("(^| )" + name + "=([^;]+)")
    );
    return match ? match[2] : null;
  };

  const cookieConsent = getCookie("cookie_consent");
  cookieModal.style.display = cookieConsent ? "none" : "block";

  // Accept all cookies
  acceptAllBtn.addEventListener("click", () => {
    setCookie("cookie_consent", "all", 365);
    cookieModal.style.display = "none";
    dominiumEnableBlockedIframes(); // ← przywraca wszystkie iframe’y
  });

  // Accept only necessary
  acceptNecessaryBtn.addEventListener("click", () => {
    setCookie("cookie_consent", "necessary", 365);
    cookieModal.style.display = "none";
  });

  // Show cookie modal when clicking the button
  document.addEventListener("click", (e) => {
    if (e.target.classList.contains("js-show-cookie-modal")) {
      cookieModal.style.display = "block";
    }
  });
};

// Block iframes with consent system
const dominiumBlockIframes = () => {
  const consentAll = document.cookie.includes("cookie_consent=all");
  const blockedDomains = window.dominiumCookieData?.blockedDomains || [];
  const placeholderTemplate =
    window.dominiumCookieData?.iframePlaceholder || "";

  if (consentAll || blockedDomains.length === 0) return;

  const iframes = document.querySelectorAll("iframe");

  iframes.forEach((iframe) => {
    const src = iframe.getAttribute("src") || "";
    const matchedDomain = blockedDomains.find((domain) => src.includes(domain));

    if (matchedDomain) {
      const domainName = domainFromSrc(src);
      const placeholder = document.createElement("div");
      placeholder.className = "iframe-placeholder";

      // Zapamiętujemy pełny kod iframe (z atrybutami i stylem)
      placeholder.setAttribute("data-iframe-html", iframe.outerHTML);
      placeholder.setAttribute("data-iframe-src", src);

      // Generujemy treść komunikatu o cookies
      const html = placeholderTemplate.replace(/{{DOMAIN}}/g, domainName);
      placeholder.innerHTML = html;

      // Zamieniamy iframe na placeholder
      iframe.parentNode.replaceChild(placeholder, iframe);
    }
  });

  function domainFromSrc(src) {
    try {
      return new URL(src).hostname.replace("www.", "");
    } catch {
      return src;
    }
  }
};

// Restore blocked iframes after consent
const dominiumEnableBlockedIframes = () => {
  const placeholders = document.querySelectorAll(
    ".iframe-placeholder[data-iframe-html]"
  );

  placeholders.forEach((ph) => {
    const iframeHtml = ph.getAttribute("data-iframe-html");
    if (!iframeHtml) return;

    ph.outerHTML = iframeHtml;
  });

  // Return google maps
  const mapContainer = document.querySelector(".map.map--empty");
  if (mapContainer) {
    const mapPlaceholder = mapContainer.querySelector(
      ".cookie_iframe_placeholder"
    );
    const iframeHtml = mapPlaceholder
      ?.closest(".iframe-placeholder")
      ?.getAttribute("data-iframe-html");

    if (iframeHtml) {
      mapContainer.innerHTML = iframeHtml;
    } else {
      const storedMap = document.querySelector(
        "[data-iframe-html*='maps.google']"
      );
      if (storedMap) {
        mapContainer.innerHTML = storedMap.getAttribute("data-iframe-html");
      }
    }

    mapContainer.classList.remove("map--empty");
  }
};

// Init
const init = () => {
  dominiumCookie();
  dominiumBlockIframes();
};

init();
