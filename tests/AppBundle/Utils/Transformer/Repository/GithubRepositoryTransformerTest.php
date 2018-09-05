<?php

namespace Tests\AppBundle\Utils\Transformer\Repository;

use AppBundle\Utils\Transformer\Repository\GithubRepositoryTransformer;
use PHPUnit\Framework\TestCase;

class GithubRepositoryTransformerTest extends TestCase
{

    /**
     * @expectedException AppBundle\Utils\Transformer\Exception\EmptyDataException
     */
    public function testEmptyDataTransform()
    {
        $data = [];

        $transformer = new GithubRepositoryTransformer();
        $repository = $transformer->transform($data);
    }

    public function testTransformComplexData()
    {
        $data = [
            "id" => 127039098,
            "node_id" => "MDEwOlJlcG9zaXRvcnkxMjcwMzkwOTg=",
            "name" => "simplepy",
            "full_name" => "kgruszowski/simplepy",
            "owner" => [
                "login" => "kgruszowski",
                "id" => 7579895,
                "node_id" => "MDQ6VXNlcjc1Nzk4OTU=",
                "avatar_url" => "https://avatars1.githubusercontent.com/u/7579895?v=4",
                "gravatar_id" => "",
                "url" => "https://api.github.com/users/kgruszowski",
                "html_url" => "https://github.com/kgruszowski",
                "followers_url" => "https://api.github.com/users/kgruszowski/followers",
                "following_url" => "https://api.github.com/users/kgruszowski/following{/other_user}",
                "gists_url" => "https://api.github.com/users/kgruszowski/gists{/gist_id}",
                "starred_url" => "https://api.github.com/users/kgruszowski/starred{/owner}{/repo}",
                "subscriptions_url" => "https://api.github.com/users/kgruszowski/subscriptions",
                "organizations_url" => "https://api.github.com/users/kgruszowski/orgs",
                "repos_url" => "https://api.github.com/users/kgruszowski/repos",
                "events_url" => "https://api.github.com/users/kgruszowski/events{/privacy}",
                "received_events_url" => "https://api.github.com/users/kgruszowski/received_events",
                "type" => "User",
                "site_admin" => false
            ],
            "private" => false,
            "html_url" => "https://github.com/kgruszowski/simplepy",
            "description" => "Simple python interpreter",
            "fork" => false,
            "url" => "https://api.github.com/repos/kgruszowski/simplepy",
            "forks_url" => "https://api.github.com/repos/kgruszowski/simplepy/forks",
            "keys_url" => "https://api.github.com/repos/kgruszowski/simplepy/keys{/key_id}",
            "collaborators_url" => "https://api.github.com/repos/kgruszowski/simplepy/collaborators{/collaborator}",
            "teams_url" => "https://api.github.com/repos/kgruszowski/simplepy/teams",
            "hooks_url" => "https://api.github.com/repos/kgruszowski/simplepy/hooks",
            "issue_events_url" => "https://api.github.com/repos/kgruszowski/simplepy/issues/events{/number}",
            "events_url" => "https://api.github.com/repos/kgruszowski/simplepy/events",
            "assignees_url" => "https://api.github.com/repos/kgruszowski/simplepy/assignees{/user}",
            "branches_url" => "https://api.github.com/repos/kgruszowski/simplepy/branches{/branch}",
            "tags_url" => "https://api.github.com/repos/kgruszowski/simplepy/tags",
            "blobs_url" => "https://api.github.com/repos/kgruszowski/simplepy/git/blobs{/sha}",
            "git_tags_url" => "https://api.github.com/repos/kgruszowski/simplepy/git/tags{/sha}",
            "git_refs_url" => "https://api.github.com/repos/kgruszowski/simplepy/git/refs{/sha}",
            "trees_url" => "https://api.github.com/repos/kgruszowski/simplepy/git/trees{/sha}",
            "statuses_url" => "https://api.github.com/repos/kgruszowski/simplepy/statuses/{sha}",
            "languages_url" => "https://api.github.com/repos/kgruszowski/simplepy/languages",
            "stargazers_url" => "https://api.github.com/repos/kgruszowski/simplepy/stargazers",
            "contributors_url" => "https://api.github.com/repos/kgruszowski/simplepy/contributors",
            "subscribers_url" => "https://api.github.com/repos/kgruszowski/simplepy/subscribers",
            "subscription_url" => "https://api.github.com/repos/kgruszowski/simplepy/subscription",
            "commits_url" => "https://api.github.com/repos/kgruszowski/simplepy/commits{/sha}",
            "git_commits_url" => "https://api.github.com/repos/kgruszowski/simplepy/git/commits{/sha}",
            "comments_url" => "https://api.github.com/repos/kgruszowski/simplepy/comments{/number}",
            "issue_comment_url" => "https://api.github.com/repos/kgruszowski/simplepy/issues/comments{/number}",
            "contents_url" => "https://api.github.com/repos/kgruszowski/simplepy/contents/{+path}",
            "compare_url" => "https://api.github.com/repos/kgruszowski/simplepy/compare/{base}...{head}",
            "merges_url" => "https://api.github.com/repos/kgruszowski/simplepy/merges",
            "archive_url" => "https://api.github.com/repos/kgruszowski/simplepy/{archive_format}{/ref}",
            "downloads_url" => "https://api.github.com/repos/kgruszowski/simplepy/downloads",
            "issues_url" => "https://api.github.com/repos/kgruszowski/simplepy/issues{/number}",
            "pulls_url" => "https://api.github.com/repos/kgruszowski/simplepy/pulls{/number}",
            "milestones_url" => "https://api.github.com/repos/kgruszowski/simplepy/milestones{/number}",
            "notifications_url" => "https://api.github.com/repos/kgruszowski/simplepy/notifications{?since,all,participating}",
            "labels_url" => "https://api.github.com/repos/kgruszowski/simplepy/labels{/name}",
            "releases_url" => "https://api.github.com/repos/kgruszowski/simplepy/releases{/id}",
            "deployments_url" => "https://api.github.com/repos/kgruszowski/simplepy/deployments",
            "created_at" => "2018-03-27T19:57:20Z",
            "updated_at" => "2018-09-01T09:06:52Z",
            "pushed_at" => "2018-06-13T10:59:29Z",
            "git_url" => "git://github.com/kgruszowski/simplepy.git",
            "ssh_url" => "git@github.com:kgruszowski/simplepy.git",
            "clone_url" => "https://github.com/kgruszowski/simplepy.git",
            "svn_url" => "https://github.com/kgruszowski/simplepy",
            "homepage" => null,
            "size" => 28,
            "stargazers_count" => 4,
            "watchers_count" => 4,
            "language" => "Python",
            "has_issues" => true,
            "has_projects" => true,
            "has_downloads" => true,
            "has_wiki" => true,
            "has_pages" => false,
            "forks_count" => 0,
            "mirror_url" => null,
            "archived" => false,
            "open_issues_count" => 0,
            "license" => null,
            "forks" => 0,
            "open_issues" => 0,
            "watchers" => 4,
            "default_branch" => "master",
            "network_count" => 0,
            "subscribers_count" => 3
        ];

        $transformer = new GithubRepositoryTransformer();
        $user = $transformer->transform($data);

        $this->assertEquals('simplepy', $user->getName());
        $this->assertEquals('kgruszowski/simplepy', $user->getFullName());
        $this->assertEquals('https://github.com/kgruszowski/simplepy', $user->getUrl());
        $this->assertEquals(4, $user->getNumOfStars());
        $this->assertEquals(4, $user->getNumOfWatchers());
        $this->assertEquals(0, $user->getNumOfForks());
        $this->assertEquals(0, $user->getNumOfOpenIssues());
    }
}
