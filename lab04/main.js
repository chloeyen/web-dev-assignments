const urls = [
    "https://www.youtube.com/", 
    "http://web.simmons.edu/~grovesd/comm244/notes/week2/links"          
];

function createBookmarks () {
    const bookmark_list = document.getElementById("bookmarkList");
    bookmark_list.innerHTML = '';           // clear any existing bookmarks before recreating a new one
    for (let url of urls) {
        const li = document.createElement("li");
        const icon = document.createElement('i');
        if (url.startsWith("https://")) {
            li.innerHTML = `<i class="fa-solid fa-lock" style="color: green"></i>      ${url}`;
        } else {
            li.innerHTML = `<i class="fa-solid fa-unlock" style="color: red"></i>      ${url}`;
        }
        bookmark_list.appendChild(li);
    }
}

function cleanString (str) {
    return str.toLocaleLowerCase().replace(/[^a-z0-9]/g, '');
}

function isPalindrome (str) {
    const cleanedStr = cleanString(str);
    const reversedStr = cleanedStr.split('').reverse().join('');
    return cleanedStr === reversedStr;
}

function checkPalindrome() {
    const inputString = document.getElementById("inputString").value;
    const result = document.getElementById("result");
    if (isPalindrome(inputString)) {
        result.style.color = "green";
        result.innerHTML = `${inputString}`;
    } else {
        result.style.color = "red";
        result.innerHTML = `${inputString}`;
    }
}
