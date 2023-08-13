const passwrdField = document.querySelector(
  ".form .field input[type='password']"
);
const toggleBtn = document.querySelector(".form .field i");

toggleBtn.onclick = () => {
  if (passwrdField.type == "password") {
    passwrdField.type = "text";
    toggleBtn.classList.add("active");
  } else {
    passwrdField.type = "password";
    toggleBtn.classList.remove("active");
  }
};
