<div class="col-md-3 ">
    <ul class="list-group" id="menu">
        <li href="#" class="list-group-item menu1 active">
            Menu
        </li>
        @foreach($data['category'] as $item)

            <a href="category/{{$item->id}}" class="list-group-item menu1">
                {{$item->name}}
            </a>


        @endforeach
    </ul>
</div>
