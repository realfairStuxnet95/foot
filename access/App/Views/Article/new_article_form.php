<div class="form-group">
    <label class="col-md-2 control-label">
        Article Title
    </label>
    <input id="title" type="text" class="form-control" name="" required>
</div>
<div class="form-group">
    <label class="col-md-2 control-label">
        Article Brief Description
    </label>
    <textarea id="description" class="form-control" rows="3"></textarea>
</div>
<div class="form-group">
    <label class="col-md-2 control-label">
        Select Article Category
    </label>
    <?php 
    $categories=$article->get_articles_categories();
    ?>
    <select id="category" class="form-control" required>
        <?php 
        foreach ($categories as $key => $value) {
            ?>
            <option value="<?php echo $value['category_id']; ?>">
                <?php echo $value['name']; ?>
            </option>
            <?php
        }
        ?>
    </select>
</div>
<textarea id="elm1"></textarea>
<div class="form-group" style="margin: 10px;">
    <input type="hidden" value="0">
  <button type="submit" class="btn btn-primary btn-bordered waves-effect w-md waves-light m-b-5">SAVE ARTICLE</button>
  <a href="#" class="btn btn-default btn-bordered waves-effect w-md m-b-5">CANCEL</a>
</div>