function validate() {
    var title = document.forms["entryForm"]["title"].value;
    var imageFile = document.forms["entryForm"]["imageFile"].value;
    var content = document.forms["entryForm"]["content"].value;

    var alerts = "";
    var flag = true;

    if(title == "" || title.length > 45){
        alerts += "Title is blank or too long. Please limit to 45 characters\n";
        if (flag){ flag = false;}
    }
    if(imageFile== "" || imageFile.length > 45) {
        alerts += "Image file is blank or too long. Please limit to 45 characters\n";
        if (flag){ flag = false;}
    }
    if(content == "" || content == "Enter text here..." || content.length > 8000) {
        alerts += "Content is blank or too long. Please limit to 8000 characters\n";
        if (flag) {
            flag = false;
        }
    }

    if(!flag){
        alert(alerts);
        return false;
    }
    return true;
}