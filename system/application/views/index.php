<?php setlocale(LC_TIME,"es_ES", "es_ES.utf8");?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
  <head>
  </head>
  <body>
  	<div id="main" class="clearfix">
    <aside>
        <nav>
            <ul id="menu">
                <li><a href="#">Home</a></li>
                <li>
                    <a href="#">Categories</a>
                    <ul>                
                        <li><a href="#">Css</a></li>
                        <li><a href="#">Graphic Design</a></li>
                        <li><a href="#">Tools</a></li>
                        <li><a href="#">Web design</a></li>                      
                    </ul>        
                </li>
                <li>
                    <a href="#">Work</a>
                    <ul>
                        <li><a href="#">Websites</a></li>
                        <li><a href="#">Logos and icons</a></li>
                        <li><a href="#">User Interfaces</a></li>
                        <li><a href="#">Other stuff</a></li>                
                    </ul>
                </li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>                   
            </ul>
        </nav>
    </aside>
    
    <div id="content">
        <article>
            <section>
                <h1><a href="http://www.red-team-design.com/css3-dropdown-menu">CSS3 Dropdown menu</a></h1>
                <figure>
                    <img src="http://www.red-team-design.com/wp-content/uploads/2011/03/css-menu.png" width="600" height="200" alt="CSS3 Dropdown menu">
                    <figcaption>Contains clean and accessible HTML structure. Javascript fix only for IE6.</figcaption>
                </figure>
            </section>
            <footer>Posted on <span>March 18th, 2011</span></footer>
        </article>
        <article>        
            <section>
                <h1><a href="http://www.red-team-design.com/how-to-create-a-cool-and-usable-css3-search-box">CSS3 search box</a></h1>
                <figure>
                    <img src="http://www.red-team-design.com/wp-content/uploads/2011/02/css3-searchbox.png" width="600" height="200" alt="CSS3 search box">
                    <figcaption>Modernizr's feature detection included.</figcaption>                    
                </figure>
            </section>
            <footer>Posted on <span>February 18th, 2011</span></footer>            
        </article>
        <article>        
            <section>
                <h1><a href="http://www.red-team-design.com/css3-tooltips">CSS3 tooltips</a></h1>
                <figure>
                    <img src="http://www.red-team-design.com/wp-content/uploads/2011/04/css3-tooltips.png" width="600" height="200" alt="CSS3 tooltips">
                    <figcaption>CSS3 gradients, box shadows, pseudo-elements.</figcaption>                    
                </figure>
            </section>
            <footer>Posted on <span>April 28th, 2011</span></footer>             
        </article>        
    </div>
</div>
	<script>
    function initMenu() {
      $('#menu ul').hide(); // Hide the submenu
      if ($('#menu li').has('ul')) $('#menu ul').prev().addClass('expandable'); // Expand/collapse a submenu when it exists  
      $('.expandable').click(
        function() {
            $(this).next().slideToggle();
            $(this).toggleClass('expanded');
          }
        );
      }
    
    // When document ready, call initMenu() function 
    $(document).ready(function() {initMenu();});    
	</script>
  </body>
</html>