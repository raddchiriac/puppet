<?php foreach($posts as $p):?>
	<div class="post">
		<h2><a href="<?php echo $p->url?>"><?php echo $p->title ?></a></h2>

		<div class="date"><?php 
            $daynum = date("j", $p->date);
            $month = date("M", $p->date);            
            $year = date("Y", $p->date);
            if($month == "Jan"){            
                $month = "ian";            
            }elseif($month == "May"){            
                $month = "mai";            
            }elseif($month == "Jun"){            
                $month = "iun";            
            }elseif($month == "Jul"){            
                $month = "iul";            
            }elseif($month == "Nov"){            
                $month = "noi";            
            }
            echo $daynum." ".$month." ".$year;
        ?></div>

		<?php 
            echo filter_markers($p->excerpt);
            echo $p->continue?'<a class="readmore" href="'.$p->url.'">Continuă ></a>':"";      
        ?>        
	</div>
<?php endforeach;?>

<?php if ($has_pagination['prev']):?>
	<a href="?page=<?php echo $page-1?>" class="pagination-arrow newer">Newer</a>
<?php endif;?>

<?php if ($has_pagination['next']):?>
	<a href="?page=<?php echo $page+1?>" class="pagination-arrow older">Older</a>
<?php endif;?>
