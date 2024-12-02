<!-- resources/views/articles/search.blade.php -->

<h2>Résultats de recherche pour "{{ request('query') }}"</h2>

@if($articles->isEmpty())
    <p>Aucun article trouvé.</p>
@else
    @foreach($articles as $article)
        <div class="article">
            <h3>{{ $article->name }}</h3>
            <p>{{ $article->description }}</p>
            <form action="{{ route('panier.ajouter') }}" method="POST">
                @csrf
                <input type="hidden" name="article_id" value="{{ $article->id }}">
                <button type="submit">Ajouter au panier</button>
            </form>
        </div>
    @endforeach
@endif
