<div class="col-sm-3">
  <div class="col-lg-12">
    <div class="panel panel-color panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Article Number:<?php echo $article_id; ?></h3>
        </div>
        <div class="panel-body">
            <form id="frm_change_status">
                <div class="form-group">
                    <label>
                        <?php 
                        $current_status=$article->get_article_status($article_id);
                        if($current_status=='SUBMITTED'){
                            ?>
                            <span class="text-warning">
                                Current Status:<?php echo $current_status; ?>
                            </span>
                            <?php
                        }elseif($current_status=='PUBLISHED'){
                            ?>
                            <span class="text-success">
                                Current Status:<?php echo $current_status; ?>
                            </span>
                            <?php
                        }
                        ?>
                    </label>
                    <select id="sel_status" class="form-control">
                        <option value="">Change Status</option>
                        <option value="PUBLISHED">
                            Published Online
                        </option>
                        <option value="SUBMITTED">
                            Submitted For evaluation
                        </option>
                        <option value="TRASHED">
                            Removed To Dustbin
                        </option>
                    </select>
                    <input id="article" type="hidden" value="<?php echo $article_id; ?>">
                    <button type="submit" class="btn btn-teal btn-sm" style="margin: 5px;">
                        CHANGE
                    </button>
                </div>
            </form>
        </div>
    </div>
  </div>
  <div class="col-lg-12">
    <div class="panel panel-color panel-primary">
        <div class="panel-heading">
            <h5 class="panel-title">Article Poster Image</h5>
        </div>
        <div class="panel-body">
            <form id="frm_upload_poster">
                <div class="form-group">
                    <label>Select Article Logo</label>
                    <input id="poster" type="file" name="poster" required>
                    <input id="article_id" type="hidden" name="article_id" value="<?php echo $article_id; ?>">
                    <?php 
                    $check_poster=$article->check_article_poster($article_id);
                    if($check_poster){
                        $posters=$article->get_article_poster($article_id);
                        foreach ($posters as $key => $poster) {
                            ?>
                            <img src="assets/IMG/<?php echo $poster['filename']; ?>" class="col-lg-12" style="margin-top: 5px;" id="preview">
                            <?php
                        }
                        ?>
                        <?php
                    }else{
                        ?>
                        <img src="" class="col-lg-12" style="margin-top: 5px;" id="preview">
                        <?php
                    }
                    ?>
                    
                    <button type="submit" class="btn btn-teal btn-sm" style="margin: 5px;">
                        UPLOAD
                    </button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>