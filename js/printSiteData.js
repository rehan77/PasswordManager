const xhr = new XMLHttpRequest()
const printDiv = document.querySelector('.site-element')

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
            output += "<div class='ind-site'><ul type='circle'><li><b>Name: </b>"+realObjectArray[key2].site_name+"</li><li><b>URL: </b>"+realObjectArray[key2].site_url+"</li><li><b>Username: </b>"+realObjectArray[key2]. site_username+"</li><li><b>Password: </b>"+realObjectArray[key2].site_password+"</li><li><b>Notes: </b>"+realObjectArray[key2].site_notes+"</li></ul><br><button>Delete</button></div>"
        }
        printDiv.innerHTML = output
        
    }
}

xhr.send();

