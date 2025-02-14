<?php

namespace App\DataFixtures;

use App\Entity\Video;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $movies = [
            [
                'title' => 'The Matrix',
                'description' => 'A computer programmer discovers that reality as he knows it is a simulation created by machines, and joins a rebellion to break free.',
                'thumbnailUrl' => 'https://m.media-amazon.com/images/M/MV5BNzQzOTk3OTAtNDQ0Zi00ZTVkLWI0MTEtMDllZjNkYzNjNTc4L2ltYWdlXkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_.jpg',
                'videoUrl' => '/videos/matrix.mp4',
                'type' => 'movie'
            ],
            [
                'title' => 'Inception',
                'description' => 'A thief who enters the dreams of others to steal secrets from their subconscious is offered a chance to regain his old life in exchange for a task considered impossible.',
                'thumbnailUrl' => 'https://m.media-amazon.com/images/M/MV5BMjAxMzY3NjcxNF5BMl5BanBnXkFtZTcwNTI5OTM0Mw@@._V1_.jpg',
                'videoUrl' => '/videos/inception.mp4',
                'type' => 'movie'
            ],
            [
                'title' => 'The Shawshank Redemption',
                'description' => 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.',
                'thumbnailUrl' => 'https://m.media-amazon.com/images/M/MV5BNDE3ODcxYzMtY2YzZC00NmNlLWJiNDMtZDViZWM2MzIxZDYwXkEyXkFqcGdeQXVyNjAwNDUxODI@._V1_.jpg',
                'videoUrl' => '/videos/shawshank.mp4',
                'type' => 'movie'
            ],
            [
                'title' => 'Stranger Things',
                'description' => 'When a young boy disappears, his mother, a police chief, and his friends must confront terrifying supernatural forces in order to get him back.',
                'thumbnailUrl' => 'https://m.media-amazon.com/images/M/MV5BMDZkYmVhNjMtNWU4MC00MDQxLWE3MjYtZGMzZWI1ZjhlOWJmXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_.jpg',
                'videoUrl' => '/videos/stranger-things.mp4',
                'type' => 'series'
            ],
            [
                'title' => 'The Dark Knight',
                'description' => 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.',
                'thumbnailUrl' => 'https://m.media-amazon.com/images/M/MV5BMTMxNTMwODM0NF5BMl5BanBnXkFtZTcwODAyMTk2Mw@@._V1_.jpg',
                'videoUrl' => '/videos/dark-knight.mp4',
                'type' => 'movie'
            ],
            [
                'title' => 'Pulp Fiction',
                'description' => 'The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.',
                'thumbnailUrl' => 'https://m.media-amazon.com/images/M/MV5BNGNhMDIzZTUtNTBlZi00MTRlLWFjM2ItYzViMjE3YzI5MjljXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_.jpg',
                'videoUrl' => '/videos/pulp-fiction.mp4',
                'type' => 'movie'
            ],
            [
                'title' => 'The Crown',
                'description' => 'Follows the political rivalries and romance of Queen Elizabeth II\'s reign and the events that shaped the second half of the twentieth century.',
                'thumbnailUrl' => 'https://m.media-amazon.com/images/M/MV5BZmY0MzBlNjctNTRmNy00Njk3LWFjMzctMWQwZDAwMGJmY2MyXkEyXkFqcGdeQXVyMDM2NDM2MQ@@._V1_.jpg',
                'videoUrl' => '/videos/the-crown.mp4',
                'type' => 'series'
            ],
        ];

        foreach ($movies as $movieData) {
            $video = new Video();
            $video->setTitle($movieData['title']);
            $video->setDescription($movieData['description']);
            $video->setThumbnailUrl($movieData['thumbnailUrl']);
            $video->setVideoUrl($movieData['videoUrl']);
            $video->setType($movieData['type']);

            $manager->persist($video);
        }

        $manager->flush();
    }
}
