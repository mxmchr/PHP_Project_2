<?php

namespace Clipmaker\Views;
class ClipsView
{
    // Méthode pour afficher tous les clips
    public function showAllClips($clips)
    {
        echo "<article class='article__clipsViews'>";

            echo "<h1 class='title__View'>Liste des clips</h1>";
            echo "<div class='search-container'>
                    <input type='text' class='search-input' placeholder='Rechercher...'>
                    <button class='search-button'>Rechercher</button>
                </div>";

            echo "<ul class='list__clips'>";
                foreach ($clips as $clip) {
                    $clipsModel = new ClipsModel();
                    $formattedDate = $clipsModel->formatCreatedAt($clip->created_at);

                    echo '<li class="list__itemClips">
                                <h2 class="title__clips"><a href="">' . $clip->title . '</a></h2>
                                <video width="400" height="225" controls>
                                    <source src="' . $clip->file_path . '" type="video/mp4">
                                </video>
                                <div class="list__footer">
                                    <h3 class="title__date">' . $formattedDate . '</h3>
                                <form action="/clips/download" method="post">
                                    <button class="download-button" type="submit" name="download">Télécharger</button>
                                </form>
                                </div>
                                
                            </li>';
                }
            echo "</ul>";
        echo "</article>";
    }
}