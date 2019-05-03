
<div class="add-post">
  <form class="add-post-form" action="admin.php" method="post" enctype="multipart/form-data">
    <div class="form-container">

      <div class="form-input-div" style="width: 50%">
        <span>
          Название:
        </span>
        <input type="text" name="post_name" autofocus class="form-input">
      </div>

      <div class="form-input-div" style="width: 50%">
        <span>
          Рубрика:
        </span>
        <select class="select" name="post_section" size="1">
          <option value="Покатушки" class="select-option">Покатушки</option>
          <option value="Путешествия" class="select-option">Путешествия</option>
          <option value="Полезное" class="select-option">Полезное</option>
          <option value="Интересное" class="select-option">Интересное</option>
        </select>
      </div>

      <div class="form-input-div">
        <span>
          Заглавная фотография:
        </span>
        <input type="file" name="post_title_img" accept="image/*">
      </div>

      <div class="form-input-div">
        <span>
          Краткое описание:
        </span>
        <textarea name="post_short" rows="8" cols="80" class="textarea post-short"></textarea>
      </div>

      <div class="form-input-div">
        <span>
          Содержание:
        </span>
        <textarea name="post_content" rows="8" cols="80" class="textarea post-content"></textarea>
      </div>

      <div>
        <input type="submit" name="submit-button" value="Опубликовать" class="submit-button">
      </div>

    </div>
  </form>
</div>
