Route::get('/test', function () {
    return response()->json([
        'message' => 'API is working!',
    ]);
});