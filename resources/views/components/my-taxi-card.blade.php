<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $taxi->original->name }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{ $taxi->price }} руб.</h6>
        <form action="{{ route('taxi.paint', ['taxi' => $taxi->id]) }}" method="POST">
            @csrf
            <input type="hidden" name="taxi_id" value="{{ $taxi->id }}">
            <select class="mb-2 mr-2" name="taxi_color">
                @foreach ($allColors as $color)
                    <option style="background-color: {{$color->code}}" class="mb-2"
                            value="{{$color->id}}">{{ $color->color }}</option>
                    <div class="col-md-4 mb-3">
                    </div>
                @endforeach
            </select>
            <div>
                <div class=" me-2 mt-2 mb-2">Текущий цвет:
                    <span class=" border border-secondary pe-2 ps-3 pt-1 m-2 rounded-circle"
                          style="background-color: {{$taxi->color->code}}"></span>
                    Первый перекрас бесплатно, далее - {{$taxi->color->price}} руб.
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Сменить цвет</button>
        </form>
    </div>
</div>
