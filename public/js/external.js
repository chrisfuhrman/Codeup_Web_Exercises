var colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];
var color = colors[Math.floor(Math.random()*colors.length)];

switch (color) {
	case 'red':
		var say = 'Red is awesome';
		break;
	case 'orange':
		var say = 'Orange is awesome';
		break;
	case 'yellow':
		var say = 'Yellow is awesome';
		break;
	case 'green':
		var say = 'Green is awesome';
		break;
	case 'blue':
		var say = 'Blue is awesome';
		break;
	default:
		var say = 'I do not know anything by that color.';
	}

	console.log(say);