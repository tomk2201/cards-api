<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CardRequest;
use App\Models\Card;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = Card::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('card_number', 'like', "%{$search}%")
                  ->orWhere('balance', 'like', "%{$search}%");
        }

        $cards = $query->orderBy('created_at', 'desc')->paginate(10);
        return response()->json($cards);
    }

    public function store(CardRequest $request): JsonResponse
    {
        $card = Card::create($request->validated());
        return response()->json(['message' => 'Card created successfully', 'data' => $card], 201);
    }

    public function show(Card $card): JsonResponse
    {
        return response()->json($card);
    }

    public function update(CardRequest $request, Card $card): JsonResponse
    {
        $card->update($request->validated());
        return response()->json(['message' => 'Card updated successfully', 'data' => $card]);
    }

    public function destroy(Card $card): JsonResponse
    {
        $card->delete();
        return response()->json(['message' => 'Card deleted successfully']);
    }
}