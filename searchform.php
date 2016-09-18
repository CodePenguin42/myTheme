<!--For formatting the search bar  -->
<!--if this document isn't here then the wordpress will be used, search 'wordpress search bar' and you should find the code then customise it-->

<form role="search" method="get" id="searchform" action="<?pho echo home_url('/'); ?>">
  <div><label class="screen-reader-text" for="s">Search for:</label>
    <input type="text" value="" name="s" id="s" placeholder="<?php the_search_query();?>"/>
    <input type="submit" id="searchsubmit" value="Search" />
  </div>
</form>

<!-- this code normally works fine, leave it alone as it already has compatability for screen readers etc, modify text and styles in css-->
