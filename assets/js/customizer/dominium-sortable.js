const initSortableList = () => {
  const lists = document.querySelectorAll(".js-sortable-list");

  lists.forEach((list) => {
    let draggedItem = null;
    const placeholder = document.createElement("li");
    placeholder.className = "sortable_list__placeholder";

    const updateHiddenInput = () => {
      const input = list.parentElement.querySelector('input[type="hidden"]');
      const values = Array.from(list.querySelectorAll(".js-sortable-item")).map(
        (li) => ({
          section: li.dataset.value,
          visible: li.dataset.visible === "true",
        })
      );
      input.value = JSON.stringify(values);
      input.dispatchEvent(new Event("change"));
    };

    // Drag logic
    list.addEventListener("dragstart", (e) => {
      const item = e.target.closest(".js-sortable-item");
      if (!item || item.classList.contains("is-hidden")) return;
      draggedItem = item;
      draggedItem.classList.add("dragging");
      e.dataTransfer.effectAllowed = "move";
    });

    list.addEventListener("dragover", (e) => {
      e.preventDefault();
      const dragging = list.querySelector(".dragging");
      if (!dragging) return;

      const rect = list.getBoundingClientRect();
      const isInside =
        e.clientY >= rect.top &&
        e.clientY <= rect.bottom &&
        e.clientX >= rect.left &&
        e.clientX <= rect.right;

      if (!isInside) return;

      const visibleItems = [
        ...list.querySelectorAll(
          ".js-sortable-item:not(.dragging):not(.is-hidden)"
        ),
      ];

      const afterElement = visibleItems.find(
        (el) => e.clientY < el.getBoundingClientRect().top + el.offsetHeight / 2
      );

      if (afterElement) {
        list.insertBefore(dragging, afterElement);
      } else {
        const firstHidden = list.querySelector(".is-hidden");
        if (firstHidden) {
          list.insertBefore(dragging, firstHidden);
        } else {
          list.appendChild(dragging);
        }
      }
    });

    list.addEventListener("dragend", () => {
      if (!draggedItem) return;
      draggedItem.classList.remove("dragging");
      draggedItem = null;
      updateHiddenInput();
    });

    // Checkbox toggle visibility
    list.addEventListener("change", (e) => {
      if (!e.target.classList.contains("js-toggle-visibility")) return;
      const li = e.target.closest(".js-sortable-item");
      const visible = e.target.checked;
      li.dataset.visible = visible ? "true" : "false";
      li.classList.toggle("is-hidden", !visible);

      // niewidoczne na dół
      if (!visible) list.appendChild(li);
      else {
        const firstHidden = list.querySelector(".is-hidden");
        if (firstHidden) list.insertBefore(li, firstHidden);
      }

      updateHiddenInput();
    });
  });
};

wp.customize.bind("ready", () => {
  initSortableList();
});
