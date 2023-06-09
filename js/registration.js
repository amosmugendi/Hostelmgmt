function validateForm(event) {
    event.preventDefault(); // Prevent form submission
  
    // Clear previous error messages
    clearErrorMessages();
  
    // Get form input values
    var regno = document.getElementById("regno").value;
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var email = document.getElementById("email").value;
    var idno = document.getElementById("idno").value;
    var dob = document.getElementById("dob").value;
    var phone = document.getElementById("phone").value;
    var county = document.getElementById("county").value;
    var contact = document.getElementById("contact").value;
  
    // Track if any validation error occurs
    var hasErrors = false;
  
    // Validate Registration Number (range: 5-7)
    if (regno.trim() === "") {
      displayErrorMessage("regno-error", "Registration Number is required.");
      hasErrors = true;
    } else if (regno.length < 5 || regno.length > 7) {
      displayErrorMessage("regno-error", "Registration Number should be between 5 and 7 characters.");
      hasErrors = true;
    }
  
    // Validate First Name (non-empty)
    if (fname.trim() === "") {
      displayErrorMessage("fname-error", "First Name is required.");
      hasErrors = true;
    }
  
    // Validate Last Name (non-empty)
    if (lname.trim() === "") {
      displayErrorMessage("lname-error", "Last Name is required.");
      hasErrors = true;
    }
  
    // Validate Email (valid format)
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email.trim() === "") {
      displayErrorMessage("email-error", "Email is required.");
      hasErrors = true;
    } else if (!emailRegex.test(email)) {
      displayErrorMessage("email-error", "Please enter a valid Email address.");
      hasErrors = true;
    }
  
    // Validate ID/Passport (range: 5-9)
    if (idno.trim() === "") {
      displayErrorMessage("idno-error", "ID/Passport is required.");
      hasErrors = true;
    } else if (idno.length < 5 || idno.length > 9) {
      displayErrorMessage("idno-error", "ID/Passport should be between 5 and 9 characters.");
      hasErrors = true;
    }
  
    // Validate Date of Birth (range: 1/1/1988 - 31/12/2005)
    var selectedDate = new Date(dob);
    var minDate = new Date("1/1/1988");
    var maxDate = new Date("12/31/2005");
  
    if (dob.trim() === "") {
      displayErrorMessage("dob-error", "Date of Birth is required.");
      hasErrors = true;
    } else if (selectedDate < minDate || selectedDate > maxDate) {
      displayErrorMessage("dob-error", "Please select a valid date.");
      hasErrors = true;
    }
  
    // Validate Phone Number (range: 10-11)
    if (phone.trim() === "") {
      displayErrorMessage("phone-error", "Phone Number is required.");
      hasErrors = true;
    } else if (phone.length < 10 || phone.length > 11) {
      displayErrorMessage("phone-error", "Phone Number should be between 10 and 11 digits.");
      hasErrors = true;
    }
  
    // Validate Home County (non-empty)
    if (county.trim() === "") {
      displayErrorMessage("county-error", "Home County is required.");
      hasErrors = true;
    }
  
    // Validate Emergency Contact (range: 10-11)
    if (contact.trim() === "") {
      displayErrorMessage("contact-error", "Emergency Contact is required.");
      hasErrors = true;
    } else if (contact.length < 10 || contact.length > 11) {
      displayErrorMessage("contact-error", "Emergency Contact should be between 10 and 11 digits.");
      hasErrors = true;
    }
  
    // Prevent form submission if there are validation errors
    if (hasErrors) {
      return false;
    } else {
      event.target.form.submit(); // Manually submit the form
    }
  }
  
  function displayErrorMessage(id, message) {
    var errorElement = document.getElementById(id);
    errorElement.innerText = message;
  }
  
  function clearErrorMessages() {
    var errorElements = document.getElementsByClassName("error-message");
    for (var i = 0; i < errorElements.length; i++) {
      errorElements[i].innerText = "";
    }
  }
  