import { Component, Input, OnInit, SimpleChanges, } from '@angular/core';
import { Observable } from 'rxjs';
import { map } from 'rxjs/operators';

import { environment } from 'src/environments/environment';
import { GridCertificadosService } from './grid-certificados.service';

@Component({
  selector: 'app-grid-certificados',
  templateUrl: './grid-certificados.component.html',
  styleUrls: ['./grid-certificados.component.scss']
})
export class GridCertificadosComponent implements OnInit {

  @Input() idAluno: number | null = 0
  @Input() isHomologador: boolean | null = false

  displayedColumns: string[] = ['nome', 'horas', 'tipo', 'status']
  alunoExibindo$ = this.gridCertificadosService.alunoExibindo$

  url_backend_certificados: string = environment.url_backend + '/certificado/'

  totalHorasHomologadas$: Observable<number> = this.alunoExibindo$
    .pipe(
      map(
        aluno => {

          if (!aluno)
            return 0

          return aluno.certificados.reduce((prev, certificado) => prev + (certificado.homologacao?.status === 'homologado' ? certificado.homologacao.horas : 0), 0)
        }
      )
    )

  constructor(
    private gridCertificadosService: GridCertificadosService,
  ) { }

  ngOnInit(): void {
  }

  ngOnChanges(changes: SimpleChanges): void {

    this.gridCertificadosService.carregarAluno(this.idAluno)
  }
}
