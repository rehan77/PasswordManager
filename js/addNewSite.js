const addNewBtn = document.querySelector('#add-site')
const siteEntryDiv = document.querySelector('.middle')
const modalBack = document.querySelector('.container')
const closeBtn = document.querySelector('#span')

addNewBtn.addEventListener('click', showModal)
closeBtn.addEventListener('click', closeModal)

function showModal(){
    siteEntryDiv.style.display = 'block'
    document.querySelector('.bottom').style.display = 'none'
    modalBack.style.background = 'rgba(0,0,0,0.5)'
}

function closeModal(){
    siteEntryDiv.style.display = 'none'
    document.querySelector('.bottom').style.display = 'block'
    modalBack.style.background = '#e4e5eb'
}

