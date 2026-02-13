<?php defined('BASEPATH') || die("Permission deined!"); ?>
  <script>
    document.querySelector("input").addEventListener("keyup", e => {
      const { value } = e.target

      document.querySelectorAll("tbody > tr > td:first-child").forEach(element => {
          if (!element.innerText.trim().includes(value.trim())) {
            element.parentElement.classList.add("hidden")
          }else {
            element.parentElement.classList.remove("hidden")
          }
      })
    })
  </script>
</body>
</html>