const form = document.querySelector(".signup form");
continueBtn = form.querySelector(".button input");
errorText = form.querySelector(".error_txt");

form.onsubmit = (e) => {
  e.preventDefault();
};

continueBtn.onclick = () => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/signup.php", true);
  xhr.onload = () => {
    if (xhr.readyState == XMLHttpRequest.DONE) {
      if (xhr.status == 200) {
        let data = xhr.response;
       if (data == 'success') {
        location.href = 'user.php';
       } else {
        errorText.texContent = data;
        errorText.style.display = "block";
       }
      }
    }
  }
  // send the form data through ajax to php
  let formData = new FormData (form); // creating new formData object
  xhr.send(formData);// sending the form data to php
};
