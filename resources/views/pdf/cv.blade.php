<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>CV - {{ $user->name }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            width: 100%;
            margin: 0 auto;
        }
        .header {
            background-color: #0d6efd;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 20px;
        }
        .section {
            margin-bottom: 20px;
        }
        .section-title {
            border-bottom: 2px solid #0d6efd;
            padding-bottom: 5px;
            margin-bottom: 15px;
            color: #0d6efd;
        }
        .project {
            margin-bottom: 15px;
        }
        .project-title {
            font-weight: bold;
        }
        .skills-list {
            display: flex;
            flex-wrap: wrap;
            margin: 0;
            padding: 0;
            list-style: none;
        }
        .skill-item {
            background-color: #e9f0ff;
            padding: 5px 10px;
            margin-right: 10px;
            margin-bottom: 10px;
            border-radius: 15px;
            font-size: 14px;
        }
        .info-item {
            margin-bottom: 10px;
        }
        .label {
            font-weight: bold;
            display: inline-block;
            width: 120px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>{{ $user->name }}</h1>
            <p>{{ $user->title ?? 'Développeur Web' }}</p>
        </div>
        
        <div class="content">
            <div class="section">
                <h2 class="section-title">Informations personnelles</h2>
                <div class="info-item">
                    <span class="label">Nom:</span> {{ $user->name }}
                </div>
                <div class="info-item">
                    <span class="label">Email:</span> {{ $user->email }}
                </div>
                @if($user->bio)
                <div class="info-item">
                    <span class="label">Bio:</span> {{ $user->bio }}
                </div>
                @endif
            </div>
            
            <div class="section">
                <h2 class="section-title">Compétences</h2>
                @if($skills->count() > 0)
                <ul class="skills-list">
                    @foreach($skills as $skill)
                    <li class="skill-item">{{ $skill->name }}</li>
                    @endforeach
                </ul>
                @else
                <p>Aucune compétence renseignée.</p>
                @endif
            </div>
            
            <div class="section">
                <h2 class="section-title">Projets</h2>
                @if($projects->count() > 0)
                    @foreach($projects as $project)
                    <div class="project">
                        <h3 class="project-title">{{ $project->title }}</h3>
                        <p>{{ $project->description }}</p>
                        @if($project->link)
                        <p><strong>Lien:</strong> {{ $project->link }}</p>
                        @endif
                    </div>
                    @endforeach
                @else
                <p>Aucun projet renseigné.</p>
                @endif
            </div>
        </div>
    </div>
</body>
</html>