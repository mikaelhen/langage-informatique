<div class="categorie">
                <select name="id_categorie">
                    <?php
                        while($l = $requeteCategorie->fetch())
                        {
                            
                        ?>

                        <option value="<?= $l['id_categorie']?>"><?= $l['nom_categorie'] ?></option>

                    <?php
                        }

                    ?>
                </select>
            </div>
            <div class="titre">
                <input type="name" name="titre_tips" placeholder="titre" value="<?php echo !empty($titre) ? $titre : ''; ?>">
            </div>
            <div class="detaille">
                <input type="name" name="detail_tips" placeholder="detail" value="<?php echo !empty($detail) ? $detail : ''; ?>">
            </div>