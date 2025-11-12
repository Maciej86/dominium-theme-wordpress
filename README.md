# Dominium

Dominium to motyw strony dla systemu WordPress. Poniższa dokumentacja jest dokumentacją użytkownika motywu. Konfiguracja motywu odbywa się po przez `Wygląd => Dostosuj`.
Motyw został zaprojektowany tak, abyś mógł szybko stworzyć nowoczesną stronę firmową bez znajomości kodu.

## Nawigacja

- [Najwżniejsze funkcje](#️najważniejsze-funkcje)
- [Instalacja](#instalacja)
- [Konfiguracja nawigacji](#konfiguracja-nawigacji)
- [Ustawienia motywu strony głównej](#ustawienia-motywu-strony-głównej)
  - [Ustawienia sekcji](#ustawienia-sekcji)
  - [Sekcja Nagłówek](#sekcja-nagłówek)
  - [Sekcja Kroki](#sekcja-kroki)
  - [Sekcja Odliczanie](#sekcja-odliczanie)
  - [Sekcja Napisz do nas](#sekcja-napisz-do-nas)
  - [Sekcja Produkty, Blok](#sekcja-produkty-blok)
- [Ustawienia kategorii](#ustawienia-kategorii)
- [Ustawienia styli wpisów](#ustawienia-styli-wpisów)
- [Ustawienia belki nad stroną](#ustawienia-belki-nad-stroną)
- [Ustawienia stopki](#ustawienia-stopki)
- [Ustawienia ciasteczek (cookie)](#ustawienia-ciasteczek-cookie)
- [Ustawienia strony kontaktowej](#ustawienia-strony-kontaktowej)
- [Widget motywu](#widget-motywu)
- [Licencja](#licencja)
- [Autor](#autor)

## Najważniejsze funkcje

- ✅ Ustawienia motywu dostępne w **Customizerze**
- ✅ Możliwość **włączania, wyłączania i sortowania sekcji** strony głównej
- ✅ Sekcje: **Nagłówek, Kroki, Odliczanie, Kontakt, Blog, Produkty**
- ✅ Automatyczne wartości domyślne, jeśli użytkownik nie wprowadzi własnych treści
- ✅ Responsywny układ – działa na desktopie, tablecie i telefonie
- ✅ Prosty, lekki kod, gotowy do dalszej rozbudowy

## Instalacja

1. Pobierz motyw z [GitHub](https://github.com/Maciej86/dominium-theme-wordpress)
2. Skopiuj folder `dominium` do katalogu:
3. W panelu WordPress przejdź do: `Wygląd → Motywy` i aktywuj **Dominium**
4. Skonfiguruj motyw: `Wygląd → Dostosuj`

## Konfiguracja nawigacji

    🛠️ Wygląd => Menu

Motyw oferuje dwie nawigacje:

- Menu główne - wyświetlane jest w górnej części strony
- Menu w stopce - wyświetlane jest w stopce strony

W obu przypadkach nawigacja jest jedno poziomowa.

> **_💡 Dopóki nawigacja nie zostanie skonfigurowana w panelu administracyjnym WordPress, nie będzie się wyświetlać prawidłowo. Wynika to z budowy nawigacji._**

## Ustawienia motywu strony głównej

    🛠️ Wygląd => Dostosuj => Ustawienia motywu strony głównej

> 💡 Strona główna składa się z kilku sekcji, które możesz **włączać, wyłączać** i **zmieniać kolejność**.

Obecnie strona główna skłąda się z następujących sekcji:

- Nagłówek - jest to część ze zdjęciem w tle
- Kroki - jest to sekcja z trzema boksami, która każa zwiera tyuł oraz treść
- Odliczanie - jest to sekcja, gdzie jest animacja odliczania zdeklarowanych wartości wraz z podpisem
- Wpisy z kategorii - jest to pierwsza tego typu sekcja, w której można wyświetlić wpisy z wybranej kategorii
- Napisz do nas - jest to wąska sekcja ze zdjęciem oraz przyciskiem kierującym do dowolnej podstrony
- Wpisy z kategorii - jest to druga sekcja tego typu, gdzie można wyświetlić wpisy z wybranej kategorii

Nawigacja czy stopka nie podlegają opcji wyłączenia czy zminy kolejności.

---

### Ustawienia sekcji

    🛠️ Wygląd => Dostosuj => Ustawienia motywu strony głównej => Ustawienia sekcji

W tym miejscu można wyłączyć lub włączyć poszczególne sekcje strony głównej, jak równieżzmienić ich kolejność na stronie.

---

### Sekcja Nagłówek

    🛠️ Wygląd => Dostosuj => Ustawienia motywu strony głównej => Sekcja - Nagłówek

Sekcja to wyświetla treści znajdujące na samej górze strony na zdjęciu.
W sekcji znajdują się dwa przyciski. Jeżeli nie podamy linka prowadzącego do innej strony lub do części strony głównej, po przez kotwicę, to przyciski nie będą wyświetlane.

**Wyświetlana zawartość:**

- w przypadku braku edycji treści, zostanie wyświetlony tekst domyślny. Jeżeli któryś z pól zostanie pusty, nie zostanie on wyświetlony
- treść z pola `Treść pod nagłówkiem` jest zawsze wyświetlana wielkimi literami, niezależnie od wprowadzonego tekstu w konfiguratorze
- treść przycisków jest zawsze wyświetlana wielkimi literami, niezależnie od wprowadzonego tekstu w konfiguratorze
- przyciemnienie na zdjęciu jest dodawane automatycznie przez motyw.

---

### Sekcja Kroki

    🛠️ Wygląd => Dostosuj => Ustawienia motywu strony głównej => Sekcja - Kroki

Sekcja wyświetlająca treść w trzech boksach.

**Wyświetlana zawartość:**

- w przypadku braku edycji treści, zostanie wyświetlony tekst domyślny
- w przypadku pozostawienia pustych pól, na stronie zostanie wyświetlony boks bez zawartości

---

### Sekcja Odliczanie

    🛠️ Wygląd => Dostosuj => Ustawienia motywu strony głównej => Sekcja - Odliczanie

Sekcja wyświetlająca cztery boksy z odliczaniem. Każda z wartości jest odliczana od zero do wartości wskazanej w ustawieniach motywu.

**Wyświetlana zawartość:**

- w przypadku braku edycji treści, zostanie wyświetlony tekst domyślny
- jeżeli chcemy uzyskać symbol metrów kwadratowych wówczas trzeba liczbę 2 otoczyć znacznikami `<sup>2</sup>`. Na stronie zostanie wyświetlone m<sup>2</sup>
- tytuł odliczania, jest zawsze wyświetlany wielkimi literami, niezależnie od wprowadzonego tekstu w konfiguratorze

---

### Sekcja Napisz do nas

    🛠️ Wygląd => Dostosuj => Ustawienia motywu strony głównej => Sekcja - Napisz do nas

Sekcja wyświetlająca nagłówek tekst oraz przycisk, prowadzący do dowolnej strony, na przykład strony kontaktowej. Dzięki konfiguracji sekcja ta może zostać wykorzystana również do promocji wydarzenia.

**Wyświetlana zawartość:**

- w przypadku braku edycji treści, zostanie wyświetlony tekst domyślny
- przyciemnienie na zdjęciu jest dodawane automatycznie przez motyw

---

### Sekcja Produkty, Blok

Obie sekcje na stronie głównej wyświetlają wpisy z wybranych kategorii. W przypadku skecji Blog, można podać alternatywny nagłówek dla tej sekcji.

## Ustawienia kategorii

## Ustawienia styli wpisów

## Ustawienia belki nad stroną

## Ustawienia stopki

## Ustawienia ciasteczek (cookie)

## Ustawienia strony kontaktowej

## Widget motywu

## W przygotowaniu

- [ ] Włączanie oraz wyłącznie opisu dla kategorii na stronie głównej oraz stronie kategorii
- [ ] Włączenie oraz włączenie belki nad nawigacją
- [ ] Zmiana ilości boksów na stronie głównej w sekcji "Odliczanie"

## Licencja

Dominium jest udostępniany na licencji **GNU General Public License v2 lub nowszej (GPL)**.  
Możesz go dowolnie używać, modyfikować i rozpowszechniać.

## Autor

**Autor:** [Maciej](https://github.com/Maciej86)  
**Repozytorium:** [https://github.com/maciej/dominium](https://github.com/Maciej86/dominium-theme-wordpress)

> Jeśli chcesz zgłosić błąd lub propozycję nowej funkcji, użyj zakładki **Issues** na GitHubie.
