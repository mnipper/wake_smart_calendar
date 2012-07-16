<?php
include '../include.php';
$db = new DatabaseFunctions();

<form>
  Event title: <input type="text" name="title" />
  Category:
  <select>
    <option>Academic</option>
    <option>Arts and Entertainment</option>
    <option>Athletics</option>
    <option>Exhibits</option>
    <option>International</option>
    <option>Lectures</option>
    <option>Major Events</option>
    <option>Professional Development</option>
    <option>Religious</option>
    <option>Other</option>
  </select>
  Calendar URL: <input type="text" name="calURL" />
  Event Location: <input type="text" name="location" />
  Start datetime: <input type="text" name="startdatetime" />
  End datetime: <input type="text" name="enddatetime" />
  Description: <input type="text" name="description" />
  Website: <input type="text" name="website" />
  <input type="submit" />
</form>
?>
