function Util() {};

// Function For Modal Open 
Util.cModal = function(cModalOpen, cModalContent, cModalClose) {
    
    if(document.querySelector(cModalOpen) !== null) {

        // Getting DOM Elements
        let modalOpen = document.querySelector(cModalOpen),
            modalContent = document.querySelector(cModalContent),
            body = document.querySelector('body');

        // Modal Open
        modalOpen.addEventListener('click', (e)=> {
            e.preventDefault();
            modalContent.classList.add('cModal-open');
            body.classList.add('fixed-overlay');
        })

        // Modal Close
        if(document.querySelector(cModalClose) !== null) {
            let modalClose = document.querySelector(cModalClose);
            modalClose.addEventListener('click', (e)=> {
                e.preventDefault();
                modalContent.classList.remove('cModal-open');
                body.classList.remove('fixed-overlay');
            })
        } 
    }
}