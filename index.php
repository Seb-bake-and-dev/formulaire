<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>PHP Avancé - Les formulaires</title>

    <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>

<main class="container">
    <h1 class="text-center"><span class="glyphicon glyphicon-list-alt"></span> Quête 106 : les formulaires</h1>


<?php


    if (!empty($_POST)){

        if (empty($_POST['name'])){
            $errors['name'] = 'Le nom ne doit pas être vide';
        }

        if (empty($_POST['email'])){
            $errors['email'] = 'Fournir un email est obligatoire';
        }

        if (empty($_POST['message'])){
            $errors['message'] = 'Complèter avec un message';
        }

        if (empty($_POST['phone'])){
            $errors['phone'][] = 'Donner un numéro de téléphone';
        } else {
            if (strlen($_POST['phone']) !== 10){
                $errors['phone'][] = 'Un numéro de téléphone est composé de 10 chiffres';
                }
            if (substr($_POST['phone'], 0, 1)){
                $errors['phone'][] = 'Un numéro de téléphone commence par le chiffre \'0\'';
                }
            }

         if (empty($_POST['subject'])){
            $errors['subject'] = 'Choisissez un sujet';
        }

        if (empty($errors)) : ?>

        <div class="row" style="background-color: rgb(222, 240, 216); border-radius: 20px; margin-top: 20px; margin-bottom: 30px">

            <div class="col-lg-2 col-md-3 col-sd-3 col-xs-5">

                <p style="font-family: 'Permanent Marker', cursive; font-size: 4em; color: rgb(248, 173, 56)" class="text-center">Yeah !</p>

            </div>


            <div class="col-lg-10 col-md-9 col-sd-9 col-xs-7">

                <p><strong>Voici les informations que rentré vous avez :</strong></p>
                <ul style="list-style: square ">
                    <li><?= htmlentities($_POST['name']) ?></li>
                    <li><?= htmlentities($_POST['email']) ?></li>
                    <li><?= htmlentities($_POST['message']) ?></li>
                    <li><?= htmlentities($_POST['phone'])?></li>
                    <li><?= htmlentities($_POST['subject'])?></li>
                </ul>

             </div>

        </div>


    <?php endif;
}

?>

            <form class="form-horizontal" method="POST" action="">

                <div class="form-group">

                    <label for="name" class="col-lg-2 control-label">Name : </label>

                    <div class="col-lg-10">
                        <?php
                        if (!empty($errors['name'])) : ?>
                            <div class="text-danger">
                                <strong><span class="glyphicon  glyphicon-warning-sign"></span> <?= $errors['name']; ?></strong>
                            </div>
                        <?php endif; ?>
                        <input type="text" class="form-control " id="name" name="name" placeholder="Votre nom" value="<?php
                        if (!empty($errors)){
                            echo htmlentities($_POST['name']);
                        }
                        ?>"/>
                    </div>

                </div>



                <div class="form-group">
                    <label for="email" class="col-lg-2 control-label">Courriel : </label>

                    <div class="col-lg-10">
                        <?php
                        if (!empty($errors['email'])) : ?>
                            <div class="text-danger">
                                <strong><span class="glyphicon  glyphicon-warning-sign"></span> <?= $errors['email']; ?></strong>
                            </div>
                        <?php endif; ?>
                        <input type="email" class="form-control" id="email" name="email" placeholder="adress.email@courrier.com" value="<?php
                        if (!empty($errors)){
                            echo htmlentities($_POST['email']);
                        }
                        ?>"/>
                    </div>

                </div>


                <div class="form-group">
                    <label for="message" class="col-lg-2 control-label">Message : </label>
                        <div class="col-lg-10">
                            <?php
                            if (!empty($errors['message'])) : ?>
                                <div class="text-danger">
                                    <strong><span class="glyphicon  glyphicon-warning-sign"></span> <?= $errors['message']; ?></strong>
                                </div>
                            <?php endif; ?>
                            <textarea class="form-control" id="message" rows="5" name="message" placeholder="Compléter votre message"><?php
                                if (!empty($errors)){
                                    echo htmlentities($_POST['message']);
                                }
                                ?></textarea>
                        </div>
                </div>

                <div class="form-group">
                    <label for="phone" class="col-lg-2 control-label">Téléphone : </label>
                        <div class="col-lg-10">

                            <?php

                                if (!empty($errors['phone'][0])) : ?>
                                        <div class="text-danger">
                                            <strong><span class="glyphicon  glyphicon-warning-sign"></span> <?= $errors['phone'][0]; ?></strong>
                                        </div>
                                <?php endif;

                                if (!empty($errors['phone'][1])) : ?>
                                    <div class="text-danger">
                                        <strong><span class="glyphicon  glyphicon-warning-sign"></span> <?= $errors['phone'][1]; ?></strong>
                                    </div>
                                <?php endif;

                            ?>

                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="0123456789" value="<?php
                            if (!empty($errors)){
                                echo htmlentities($_POST['phone']);
                            }
                            ?>"/>
                        </div>
                </div>



                <div class="form-group">
                    <label for="subject" class="col-lg-2 control-label">Sujet : </label>

                    <div class="col-lg-10">

                        <?php
                        if (!empty($errors['subject'])) : ?>
                            <div class="text-danger">
                                <strong><span class="glyphicon  glyphicon-warning-sign"></span> <?= $errors['subject']; ?></strong>
                            </div>
                        <?php endif; ?>

                        <select id="subject" name="subject" class="form-control">
                            <option value="" <?php if (empty($errors)){echo 'selected';} ?>>Choisissez un sujet dans la liste</option>
                            <option value="sub1" <?php if (!empty($errors) && $_POST['subject'] == 'sub1'){echo 'selected';} ?>>Sujet 1</option>
                            <option value="sub2" <?php if (!empty($errors) && $_POST['subject'] == 'sub2'){echo 'selected';} ?>>Sujet 2</option>
                            <option value="sub3" <?php if (!empty($errors) && $_POST['subject'] == 'sub3'){echo 'selected';} ?>>Sujet 3</option>
                        </select>

                    </div>
                </div>



                <div class="text-center col-lg-10 col-lg-offset-2">

                    <button type="submit" class="btn btn-primary btn-lg " style="width: 900px; height: 200px; background-color: green; border-radius: 50px; color: blue; font-size: 6em; border: black 5px solid; margin-top: 20px; margin-bottom: 20px;
    font-family: 'Monoton', cursive;">Envoyer tout ça</button>

                </div>


            </form>


    </main>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>

</html>
