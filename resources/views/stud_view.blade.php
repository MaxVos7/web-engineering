<!DOCTPE html>
<html>
<head>
    <title>View Student Records</title>
</head>
<body>
<table border = "1">
    <tr>
        <td>title</td>
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
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->title}}</td>
            <td>{{ $user->rating}}</td>
            <td>{{ $user->year}}</td>
            <td>{{ $user->users_rating}}</td>
            <td>{{ $user->votes}}</td>
            <td>{{ $user->metascore}}</td>
            <td>{{ $user->img_url}}</td>
            <td>{{ $user->countries}}</td>
            <td>{{ $user->languages}}</td>
            <td>{{ $user->actors}}</td>
            <td>{{ $user->genre}}</td>
            <td>{{ $user->tagline}}</td>
            <td>{{ $user->description}}</td>
            <td>{{ $user->directors}}</td>
            <td>{{ $user->runtime}}</td>
            <td>{{ $user->imdb_url}}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
