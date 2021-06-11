<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Pedido Exitoso</title>
	<link rel="stylesheet" href="">
	<style>
	
	    .card{
	        position:relative;
	        display:block;
	        margin:auto;
	        background:white;
	        box-shadow: 0px 0px 5px 0px rgba(0,0,0,.5);
	        border-radius:5px;
	        margin:auto;
	        max-width:500px;
	    }
	    
	    .card-body{
	        padding: 10px 5px;
	    }
	    
	    .card-body h2{
	        text-align:center;
	        display:block;
	        color:#05C6C6;
	    }
	    
	    .card-body p{
	        text-align:center;
	        display:block;
	        color: #05408D;
	    }
	    
	    .btn{
	        display:block;
	        max-width: 250px;
	        margin:auto;
	        position:relative;
	        background-color:#05C6C6;
	        color:white !important;
	        padding: 5px 10px;
	        border-radius:5px;
	        cursor:pointer;
	        text-decoration:none;
	        text-align:center;
	    }
	    
	    .btn:hover{
	        background-color: #05408D;
	        transition: all .5s ease-in-out;
	    }
	</style>
</head>
<body>
    <div class="card">
        <div class="card-body">
            <h2>{{ $msg }}</h2>
            <p>Pulsa el siguiente Botón para descargar nuestro catálogo</p>
            <a class="btn" href="http://{{ $host }}/documents/get/{{ $document }}" target="_blank">DESCARGAR CATÁLOGO</a>
        </div>
    </div>

</body>
</html>
