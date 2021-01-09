<!DOCTPE html>
<html>
<head>
    <title>View Student Records</title>
</head>
<body>
<table border = "1">
    <tr>
        <td>title</td>
        <td>slug</td>
        <td>rating</td>
        <td>year</td>
        <td>users_rating</td>
        <td>votes</td>
        <td>metascore</td>
        <td>img_url</td>
        <td>countries</td>
        <td>languages</td>
        <td>actors</td>
        <td>genre</td>
        <td>tagline</td>
        <td>description</td>
        <td>directors</td>
        <td>runtime</td>
        <td>imdb_url</td>
    </tr>
    @foreach ($movies as $movie)
        <tr>
            <td>{{ $movie->title}}</td>
            <td>{{ $movie->slug}}</td>
            <td>{{ $movie->rating}}</td>
            <td>{{ $movie->year}}</td>
            <td>{{ $movie->users_rating}}</td>
            <td>{{ $movie->votes}}</td>
            <td>{{ $movie->metascore}}</td>
            <td>{{ $movie->img_url}}</td>
            <td>{{ $movie->countries}}</td>
            <td>{{ $movie->languages}}</td>
            <td>{{ $movie->actors}}</td>
            <td>{{ $movie->genre}}</td>
            <td>{{ $movie->tagline}}</td>
            <td>{{ $movie->description}}</td>
            <td>{{ $movie->directors}}</td>
            <td>{{ $movie->runtime}}</td>
            <td>{{ $movie->imdb_url}}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
