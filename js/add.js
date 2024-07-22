function test()
{
    let name = document.getElementById('name').value;
    let pass = document.getElementById('pass').value;
    let d1 = document.getElementById('d1').value;
    let d2 = document.getElementById('d2').value;
    let d3 = document.getElementById('d3').value;

    if(name == null){
        alert('Имя пользователя должно быть заполнено!');
        return;
    }
    if(pass == null){
        alert('Пароль пользователя должен быть заполнен!');
        return;
    }
    if(d1 == null){
        alert('Информация о пользователе должна быть заполнена!');
        return;
    }
    if(d2 == null){
        alert('Информация о пользователе должна быть заполнена!');
        return;
    }
    if(d3 == null){
        alert('Информация о пользователе должна быть заполнена!');
        return;
    }
    add(name, pass, d1, d2, d3);
}

function add(name, pass, d1, d2, d3){
    fetch('../php/api.php', {
        method: 'POST',
		headers: {
			'Content-Type': 'application/json'
		},
		body: JSON.stringify({
			code: 'add',
            name: name,
            pass: pass,
            d1: d1,
            d2: d2,
            d3: d3
		})
    })
    .then(response => response.json())
	.then(data => {
		if(data['acces'] == "granted")
            alert('Успех!');
		else
			alert(data['error']);
	});
}