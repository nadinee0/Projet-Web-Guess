<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact form</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container"></div>
    <header>
        <h1> Reclamation </h1>
    </header>
   
    <main>
        <form id="reclamation_form" class="form_class"action="ajoutReclamationAction.php" method="post">
            <div class="form_div">
                <label>REF</label>
                <input class="field_class" id="ref"S name="ref" type="text" placeholder="ref" autofocus  >
            <label>Nom:</label>
                <input class="field_class" id= "nom" name="nom" type="text" placeholder="Saisissez votre nom" autofocus  >
                <label>E-mail:</label>
                <input id="email" class="field_class" name="email" type="text" placeholder="Saisissez votre e-mail"  >

                <label>Type</label>
                <select  class="field_class" name="type" id="type">
                <option value="">--Please choose an option--</option>
                <option value="Interne">Intere</option>
                <option value="Externe">Externe</option>
               
</select>

 
<BR>
              
<label>description:</label>
                <input class="field_class" id= "description" name="description" type="text" placeholder="Saisissez votre description" autofocus  >
              
                <label>User</label>
                <input id="number" class="field_class" name="number" type="text" placeholder="Saisissez le user"  >


           
    
                <button class="submit_class" type="submit" form="reclamation_form" >Envoyer</button>
                
    

            <div>
            <button class="submit_class" type="reset" form="reclamation_form" >Annuler</button>
        </div>
           
        </form>
    </main>
    <footer>
        <p> <p>Feel free to contact us and we will get back to you as soon as we can.</p><a href="http://localhost/Atelierphp/proj/view/Front/#">TheBeautyShop&trade;</a></p>
    </footer>


    
       
        
</body>
</html>