// check if string contains only letters
function isOnlyLetters(str) {
    return /^[a-zA-Z\s]+$/.test(str);
}

// check if input is 3 digits in parentheses, followed by 3 digits, a dash and 4 digits.
function checkPhoneNum(phone) {
    return /^\(\d{3}\) \d{3}-\d{4}$/.test(phone);
}

// change format of phone number
function changePhoneNumFormat(phone) {
    if(checkPhoneNum(phone)) {
        const transformed = phone.replace(/^\((\d{3})\)\s(\d{3})-(\d{4})$/, "$1-$2-$3");
        return transformed;
    } else {
        return false;
    }
}

// diplay function
function formValidation () {
    let name = document.getElementById("name").value;
    let address = document.getElementById("address").value;
    let phoneNumber = document.getElementById("phoneNumber").value;
    let displayArea = document.getElementById("displayArea");
    let formattedPhone = changePhoneNumFormat(phoneNumber);
    if (isOnlyLetters(name) && checkPhoneNum(phoneNumber)) {
        displayArea.innerHTML = `<p><strong>Name:</strong> ${name}</p>
                                <p><strong>Address:</strong> ${address}</p>
                                <p><strong>Phone Number:</strong> ${formattedPhone}</p>`;
    } else {
        displayArea.innerHTML = `<p style="color: red;">Please enter a valid name and phone number in the correct format</p>`;
    }
}

// count characters
function charCount() {
    let textInput = document.getElementById("textInput").value;
    document.getElementById("charCount").textContent = `Characters: ${textInput.length}`;
}

// count only letters
function letterCount() {
    let textInput = document.getElementById("textInput").value;
    lettersOnly = textInput.match(/[a-zA-Z]/g) || [];
    document.getElementById("letterCount").textContent = `Letters: ${lettersOnly.length}`
}

// update charater count and letter count in real time when user input text
document.getElementById("textInput").addEventListener("input", function () {
    charCount();
    letterCount();
});


$(document).ready(function () {
    // open full-screen view
    $("#clickable-image").click(function () {
        const imageSrc = $(this).attr("src");
        $("#full-screen-image").attr("src", imageSrc);
        $("#full-screen-container").css("display", "flex");
    });

    // close full-screen view
    $(".close-icon").click(function () {
        $("#full-screen-container").css("display", "none");
    });
});