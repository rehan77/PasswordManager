const xhr = new XMLHttpRequest()
const printDiv = document.querySelector('.site-element')

xhr.open('GET', 'php/getSiteData.php', true)
xhr.onload = function () {
    if (this.status == 200) {
        const objectArray = JSON.parse(this.responseText)
        
        //Converting objectArray elements into object literals from JSON
        const realObjectArray = {}
        for(const key in objectArray){
            const value = JSON.parse(objectArray[key])
            realObjectArray[key] = value
        }

        //Iterating over the realObjectArray to print the site data stored in each element
        let output = ''
        for(const key2 in realObjectArray){
            output += `<div class="ind-site"><form id="form1" action="php/deleteSiteData.php" method="post"><label>Name: </label><input type="text" value="${realObjectArray[key2].site_name}" disabled/><br><label>URL: </label><input type="text" value="${realObjectArray[key2].site_url}" disabled/><br><label>Username: </label><input type="text" name="siteuser" value="${realObjectArray[key2].site_username}"><br><label>Password: </label><input type="text" name="sitepass" value="${realObjectArray[key2].site_password}"><br><label>Notes: </label><input type="text" value="${realObjectArray[key2].site_notes}" disabled/><br><input type="submit" name="del-btn" id="del-btn" value="Delete"/></form></div>`
        }
        
        printDiv.innerHTML = output
        
    }
}

xhr.send()