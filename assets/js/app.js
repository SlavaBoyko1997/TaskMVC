var cnt=0;

async function getAllTodos(use) {
    cnt = parseInt(cnt) + parseInt(1)
    if (cnt <= 10){
        const res = await fetch(`http://jsonplaceholder.typicode.com/posts/${cnt}`);
        const todos = await res.json();
        todoToHTML(todos,use)
    }
}

function todoToHTML({id,title,body},user) {
    const todoList = document.getElementById('todo');
    todoList.insertAdjacentHTML('beforeend',`
<div class="col" id="${id}">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">${title}</h1>
                        <input type="text" name="title${cnt}" value="${title}" hidden>
                        <ul class="list-unstyled mt-3 mb-4">
                          <p>${body}</p>
                          <input type="text" name="body${cnt}" value="${body}" hidden>
                          <input type="text" name="user${cnt}" value="${user}" hidden>
                        </ul>
                    </div>
                </div>
            </div>
    `)
}