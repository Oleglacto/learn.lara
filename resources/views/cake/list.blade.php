@if (isset($cakes))

        @foreach($cakes as $cake)
            <div class="d-flex flex-row">
                <div class="p-2">Название: {{ $cake->name }}</div>
                <div class="p-2">Вес: {{ $cake->weight }}</div>
                <div class="p-2">Описание: {{ $cake->description }}</div>
                <div class="p-2">Цена: {{ $cake->price }}</div>
                <div class="p-2">Активный? {{ $cake->active }}</div>
            </div>
        @endforeach

@endif