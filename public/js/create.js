function addSubtitle(){
    subtitle_count = parseInt(document.getElementById('subtitle_count').value) + 1;

    var str = '<hr>';

    str += '<div class="row">';
    str += '<div class="form-group col-md-6">';
    str += '<label for="subtitle_input">議題' + subtitle_count + '</label>';
    str += '<input type="text" class="form-control" id="subtitle_input' + subtitle_count + '" name="subtitle_input' + subtitle_count + '">';
    str += '</div>';
    str += '</div>';

    str += '<div class="form-group">';
    str += '<label for="contents_input">内容' + subtitle_count + '</label>';
    str += '<textarea class="form-control" id="contents_input' + subtitle_count + '" name="contents_input' + subtitle_count + '" rows="10"></textarea>';
    str += '</div>';

    document.getElementById('add_subtitle').insertAdjacentHTML('beforeend', str);
    document.getElementById('subtitle_count').value = subtitle_count;
}

function addGenre(){
    var add_genre = document.getElementById('add_genre_input').value;
    var select_genre = document.getElementById('genre_input');

    var add_option = document.createElement('option');
    add_option.text = add_genre;
    add_option.value = add_genre;

    var add_index = select_genre.appendChild(add_option);
    select_genre.selectedIndex = add_index.index;

    document.getElementById('add_genre_input').value = '';
    $('#genre_add_modal').modal('hide');
}