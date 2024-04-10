<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;


class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $demandes = Demande::all();
        return view('demandes.index', compact('demandes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('demandes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'date_demande' => 'required|date',
            'demandeur_nom' => 'required|string|max:255',
            'demandeur_prenom' => 'required|string|max:255',
            'service' => 'required|string|max:255',
            'localisation_exacte' => 'required|string|max:255',
            'commune' => 'required|string|max:255',
            'validateur' => 'nullable|string|max:255',
            'date_validation' => 'nullable|date',
            'demande_prestataire' => 'required|boolean',
            'date_mise_en_place' => 'nullable|date',
            'commentaires' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('public/photos_demandes');
            $data['photo'] = str_replace('public/', '', $data['photo']); // Enlève le préfixe 'public/' du chemin enregistré.
        }
        

        Demande::create($data);

        return redirect()->route('demandes.index')->with('success', 'Demande créée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Demande $demande)
    {
        return view('demandes.show', compact('demande'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Demande $demande)
    {
        return view('demandes.edit', compact('demande'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demande $demande)
    {
        $data = $request->validate([
            'date_demande' => 'required|date',
            'demandeur_nom' => 'required|string|max:255',
            'demandeur_prenom' => 'required|string|max:255',
            'service' => 'required|string|max:255',
            'localisation_exacte' => 'required|string|max:255',
            'commune' => 'required|string|max:255',
            'validateur' => 'nullable|string|max:255',
            'date_validation' => 'nullable|date',
            'demande_prestataire' => 'required|boolean',
            'date_mise_en_place' => 'nullable|date',
            'commentaires' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            // Delete the old photo if exists
            if ($demande->photo && \Storage::exists($demande->photo)) {
                \Storage::delete($demande->photo);
            }
            $data['photo'] = $request->file('photo')->store('photos_demandes');
        }

        $demande->update($data);

        return redirect()->route('demandes.index')->with('success', 'Demande mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demande $demande)
    {
        if ($demande->photo && \Storage::exists($demande->photo)) {
            \Storage::delete($demande->photo);
        }

        $demande->delete();
        
        return redirect()->route('demandes.index')->with('success', 'Demande supprimée avec succès.');
    }


    public function exportPdf(Demande $demande)
{
    $pdf = PDF::loadView('demandes.pdf', compact('demande'));
    return $pdf->download('demande-'.$demande->id.'.pdf');
}
}
