import { Component, OnInit } from '@angular/core';
import { FormControl } from '@angular/forms';
import { Observable } from 'rxjs';
import { debounceTime, switchMap, tap } from 'rxjs/operators';

import { DashboardCertificadosService } from './dashboard-certificados.service';
import { AuthService } from 'src/app/shared/auth.service';
import { User } from 'src/app/shared/types';
import { AlunoSelecionadoService } from '../aluno-selecionado.service';
import { GridCertificadosService } from '../grid-certificados/grid-certificados.service';

@Component({
  selector: 'app-dashboard-certificados',
  templateUrl: './dashboard-certificados.component.html',
  styleUrls: ['./dashboard-certificados.component.scss']
})
export class DashboardCertificadosComponent implements OnInit {

  idAlunoSelecionado$: Observable<number> = this.alunoSelecionadoService.idAlunoSelecionado$

  userIsHomologador$: Observable<boolean> = this.authService.userIsHomologador$
  userIsAluno$: Observable<boolean> = this.authService.userIsAluno$

  formControlAlunoSelecionado = new FormControl()
  alunosFiltrados$: Observable<User[]> | undefined;

  constructor(
    private authService: AuthService,
    private alunoSelecionadoService: AlunoSelecionadoService,
    private dashboardCertificadosService: DashboardCertificadosService,
    private gridCertificadosService: GridCertificadosService,
  ) { }

  ngOnInit() {

    this.alunosFiltrados$ = this.formControlAlunoSelecionado.valueChanges
      .pipe(
        tap(
          aluno => {

            if (aluno && aluno.id) {

              this.alunoSelecionadoService._idAlunoSelecionado$.next(aluno.id)
            }
          }
        ),
        debounceTime(500),
        switchMap(value => this.dashboardCertificadosService.queryAlunos(value))
      );
  }

  refreshGrid() {

    this.gridCertificadosService.recarregarAluno()
  }

  displayFn(user: User): string {

    return user && user.name ? user.name : '';
  }
}
