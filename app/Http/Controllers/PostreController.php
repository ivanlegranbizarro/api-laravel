<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostreRequest;
use App\Http\Requests\UpdatePostreRequest;
use App\Models\Postre;
use Illuminate\Http\JsonResponse;

class PostreController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): JsonResponse
  {
    return response()->json(Postre::all());
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StorePostreRequest $request): JsonResponse
  {
    $postre = new Postre(
      $request->validated()
    );
    $postre->save();

    return response()->json($postre, 201);
  }

  /**
   * Display the specified resource.
   */
  public function show(Postre $postre): JsonResponse
  {
    return response()->json($postre);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdatePostreRequest $request, Postre $postre): JsonResponse
  {
    $postre->update(
      $request->validated()
    );

    return response()->json($postre);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Postre $postre): JsonResponse
  {
    return response()->json($postre->delete(), 204);
  }
}
