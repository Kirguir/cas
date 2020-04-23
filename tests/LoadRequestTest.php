<?php


use App\Requests\LoadRequest;
use PHPUnit\Framework\TestCase;

class LoadRequestTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @param $data
     * @param $expected
     */
    public function testCreateLoadRequest($data, $expected)
    {
        $request = new LoadRequest($data);
        $this->assertSame($expected, $request->check_file);
    }

    public function dataProvider()
    {
        return [
            'empty' => [
                [],
                null
            ],
            'file not selected' => [
                ['check_file' => [
                    'tmp_name' => null
                ]],
                null
            ],
            'normal' => [
                ['check_file' => [
                    'size' => 10000,
                    'tmp_name' => 'upload.jpeg'
                ]],
                [
                    'size' => 10000,
                    'tmp_name' => 'upload.jpeg'
                ]
            ]
        ];
    }
}
