/*const submitBtn = document.querySelector('.submit__btn')
const userName = document.querySelector('#user')
const comment = document.querySelector('#comment')
const count = document.querySelector('.count')
const commentsCont = document.querySelector('.comments__container')*/


function resettaForm(){
    commento.value = ''
}

function aggiungiComm(item){
    // select first letter of the user name
    const nick = $_SESSION['user'];
    var_dump(nick);
    // create new div
    const div = document.createElement('div')
   
    // add class
    div.classList = 'comment__card'
    // add id
    div.id = item.id 
    // add html
    div.innerHTML = `
    <div class="pic center__display">
                    ${letter}
                </div>
                <div class="comment__info">
                    <small class="nickname">
                        ${item.userName}
                    </small>
                    <p class="comment">
                        ${item.userComment}
                    </p>
                    <div class="comment__bottom">
                        <div class="heart__icon--comment">
                            ${item.typeOfFeedback ? `<i class="fas fa-heart positive"></i>` : `<i class="far fa-heart"></i>`}
                        </div>
                        <button>
                            Reply
                        </button>
                    </div>
                </div>
    `
    // insert feedback into the list
    commentsCont.insertAdjacentElement('beforeend', div)
}