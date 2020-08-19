const xhr = new XMLHttpRequest()
const printDiv = document.querySelector('.replace')

xhr.open('GET', 'php/getSiteData.php', true)
xhr.onload = function () {
    if (this.status == 200) {
        const objectArray = JSON.parse(this.responseText)
        const realObjectArray = {}
        for(const key in objectArray){
            const value = JSON.parse(objectArray[key])
            realObjectArray[key] = value
            console.log(realObjectArray)
        }
        let output = ''
        for(const key2 in realObjectArray){
            output += realObjectArray[key2].site_name+"<br>"+realObjectArray[key2].site_url+"<br>"+realObjectArray[key2].site_username+"<br>"+realObjectArray[key2].site_password+"<br>"+realObjectArray[key2].site_notes+"<br><br>"
        }
        printDiv.innerHTML = output
                
    }
}

xhr.send();

