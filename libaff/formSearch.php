<?php
if (!isset($data)) {
    $data = new Data();
}
?>
<form action="search.php" method="GET">
    <label for="search">Search :</label>
    <input type="text" name="search">
    <label for="searched">What do you search</label>
    <ul>
        <li><input type="checkbox" name="searched[]" value="users">Users</li>
        <li><input type="checkbox" name="searched[]" value="events">Events</li>
    </ul>
    <label for="tags[]">Tags :</label>
    <ul>
        <?php foreach ($data->getTags() as $tag) : ?>
            <li><input type="checkbox" name="tags[]" value="<?php echo $tag; ?>"/><?php echo $tag; ?></li>
        <?php endforeach; ?>
    </ul>
    <input type="submit" value="Search">
</form>
