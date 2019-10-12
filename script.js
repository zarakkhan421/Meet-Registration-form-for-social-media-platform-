
function validateForm(){
    var formColor=document.forms["form"]["email"];
    var formValue=formColor.value;
    console.log(formColor.style.borderColor,formValue)
    
    if (formValue==""){
        alert(formColor.style.borderColor,formValue);
        formColor.style.borderColor="red";
        return false;
    }
}