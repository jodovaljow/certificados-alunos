import { Injectable } from '@angular/core';
import { BehaviorSubject, combineLatest, Observable } from 'rxjs';
import { map } from 'rxjs/operators';

import { AuthService } from '../shared/auth.service';

@Injectable({
  providedIn: 'root'
})
export class AlunoSelecionadoService {

  private _idAlunoSelecionado$ = new BehaviorSubject<number>(0)
  idAlunoSelecionado$: Observable<number> = combineLatest([this._idAlunoSelecionado$, this.authService.user$])
    .pipe(
      map(
        ([idAlunoSelecionado, user]) => {

          if (idAlunoSelecionado) {
            return idAlunoSelecionado
          }

          if (user?.is_aluno) {
            return user.id
          }

          return 0
        }
      )
    )

  constructor(
    private authService: AuthService,
  ) { }
}
