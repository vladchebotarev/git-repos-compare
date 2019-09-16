<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompareRequest;
use GrahamCampbell\GitHub\Facades\GitHub;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function compare (CompareRequest $request){
        try {
            $parseRepo1 = $this->parseRepoUrl($request->get('repo1'));
            $parseRepo2 = $this->parseRepoUrl($request->get('repo2'));

            $repo1 = GitHub::repo()->show($parseRepo1->get('author'), $parseRepo1->get('name'));
            $repo1OpenPullRequests = count(GitHub::pullRequest()->all($parseRepo1->get('author'), $parseRepo1->get('name'), ['state' => 'open', 'per_page' => '100']));
            $repo1ClosedPullRequests = count(GitHub::pullRequest()->all($parseRepo1->get('author'), $parseRepo1->get('name'), ['state' => 'closed', 'per_page' => '100']));

            $repo2 = GitHub::repo()->show($parseRepo2->get('author'), $parseRepo2->get('name'));
            $repo2OpenPullRequests = count(GitHub::pullRequest()->all($parseRepo2->get('author'), $parseRepo2->get('name'), ['state' => 'open', 'per_page' => '100']));
            $repo2ClosedPullRequests = count(GitHub::pullRequest()->all($parseRepo2->get('author'), $parseRepo2->get('name'), ['state' => 'closed', 'per_page' => '100']));

            $data = array(
                'repo1' => [
                    'full_name' => $repo1['full_name'],
                    'language' => $repo1['language'],
                    'forks' => $repo1['forks_count'],
                    'stars' => $repo1['stargazers_count'],
                    'watchers' => $repo1['watchers_count'],
                    'pushed_at' => $repo1['pushed_at'],
                    'open_pull_request' => $repo1OpenPullRequests,
                    'closed_pull_request' => $repo1ClosedPullRequests
                ],
                'repo2' => [
                    'full_name' => $repo2['full_name'],
                    'language' => $repo2['language'],
                    'forks' => $repo2['forks_count'],
                    'stars' => $repo2['stargazers_count'],
                    'watchers' => $repo2['watchers_count'],
                    'pushed_at' => $repo2['pushed_at'],
                    'open_pull_request' => $repo2OpenPullRequests,
                    'closed_pull_request' => $repo2ClosedPullRequests
                ]
            );

            return response()->json($data)->header('Content-Type', 'application/json');

        } catch (\Exception $exception) {
            return response()
                ->json([
                    'code' => '400',
                    'error' => 'Wrong GitHub Repositories URL!'
                ])
                ->header('Content-Type', 'application/json');
        }
    }

    /**
     * @param string $url
     * @return \Illuminate\Support\Collection
     */
    private static function parseRepoUrl(string $url)
    {
        $path = parse_url($url, PHP_URL_PATH);
        $path_array = explode("/", $path);
        $path_collection = collect(['author' => $path_array[1], 'name' => $path_array[2]]);
        return $path_collection;
    }
}
