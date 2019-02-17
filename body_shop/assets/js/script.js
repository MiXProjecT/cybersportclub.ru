(() => {
  const tabs = document.querySelectorAll(".tab");
  const contents = document.querySelectorAll(".tab-content");
  const tabsWrap = document.querySelector(".tabs-titles-wrap");
  const activeClass = "active";

  tabsWrap.addEventListener("click", e => {
    if (e.target.classList.contains("tab")) {
      [...tabs].forEach((tab, tabIndex, tabArray) => {
        tab.classList.remove(activeClass);
        contents[tabIndex].classList.remove(activeClass);
        if (e.target === tab) {
          tab.classList.add(activeClass);
          contents[tabIndex].classList.add(activeClass);
        }
      });
    }
  });
})();