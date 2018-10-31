<div class="card mt-4">
    <div class="card-body">
        <form method="POST" action="{{ route('post.store') }}">
            @csrf
            <div class="form-group">
                <textarea 
                    style="resize: none;" 
                    ng-init="post_creating_form_is_activated=false" 
                    ng-focus="post_creating_form_is_activated=true" 
                    ng-model="post_creating_text"
                    class="form-control" 
                    name="text" 
                    rows="1" 
                    placeholder="Що у Вас на думці?" 
                    id="post_creating_input"></textarea>
            </div>
            <div ng-class="{'d-none': (post_creating_form_is_activated==false)}" class="d-none">
                <div class="float-left">
                    <button type="submit" class="btn btn-primary ladda-button" data-style="slide-left">
                        <span class="ladda-label">
                                <i class="fas fa-check"></i> Поділитись
                        </span>
                    </button>
                </div>
                <div class="float-left pl-1">
                    <button type="button" class="btn btn-light" ng-click="post_creating_form_is_activated=false; 
                    post_creating_text=null;" onclick="$('#post_creating_input').css('height', 'auto');"><i class="fas fa-times"></i> Скасувати</button>
                </div>
                <div class="float-right">
                    <div class="btn-group" role="group">
                        <button 
                            type="button" 
                            class="btn btn-light text-danger" 
                            title="Прикріпити зображення" 
                            data-toggle="tooltip" 
                            data-delay='{"show":"1000", "hide":"10"}' 
                            >
                            <i class="far fa-image"></i>
                        </button>
                    </div>
                    
                </div>
            </div>
        </form>
    </div>
    
</div>

@section('js-section')
@parent
<script>
// var cancelCreationPost = function() {
//     ('#post_creating_input').css('height', 'auto'); alert('aa');
// };

$(function() {
    $('#post_creating_input').autogrow();
});
</script>
@endsection
