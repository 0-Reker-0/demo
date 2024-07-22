window.addEventListener('load', query_set());

function query_set()
{
    fetch('../php/api.php', {
        method: 'POST',
		headers: {
			'Content-Type': 'application/json'
		},
		body: JSON.stringify({
			code: 'show',
		})
    })
    .then(response => response.json())
	.then(data => {
		if(data['acces'] == "granted")
            set(data['data'])
		else
			alert(data['error']);
	});
}

function send(who, val)
{
    fetch('../php/api.php', {
        method: 'POST',
		headers: {
			'Content-Type': 'application/json'
		},
		body: JSON.stringify({
			code: 'upd',
            val: val,
            data: who
		})
    })
    .then(response => response.json())
	.then(data => {
		if(data['acces'] == "granted"){
            alert('Успех!');
            query_set();
        }
		else
			alert(data['error']);
	});
}

function set(data)
{
    let d1 = document.getElementById('data_1');
    let d2 = document.getElementById('data_2');
    let d3 = document.getElementById('data_3');
    d1.innerHTML = data[0];
    d2.innerHTML = data[1];
    d3.innerHTML = data[2];
}